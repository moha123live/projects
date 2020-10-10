<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="css/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link rel="shortcut icon" href="#">
  <title>Order Page</title>

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div id="app">
    <v-app>
      <v-main>
        <v-container class="grey lighten-5 mb-6">

          <!-- icon with title -->
          <h5><img src="img/firwork-icon.png" style="width: 30px; height: 20px; display: inline-block;"> Order Screen</h5>
          
          <!-- input fields -->
          <v-text-field v-model="customeName" prepend-icon="mdi-account" label="Customer Name" clearable ></v-text-field>
          <v-text-field v-model="place" prepend-icon="mdi-map-marker" label="Place" clearable class="cus-top"></v-text-field>
          <v-text-field v-model="mobileNum" prepend-icon="mdi-dialpad" label="Mobile Number" clearable class="cus-top"></v-text-field>
            
          <!-- buttons -->
          <v-row justify="space-around">
            <v-btn color="orange darken-2" elevation="2" small @click="clearFields">CLEAR</v-btn>
            <v-btn color="error" elevation="2" small @click="close">CLOSE</v-btn>
            <v-btn color="primary" elevation="2" small>SUBMIT</v-btn>
            <!-- <v-btn color="teal" elevation="2" small v-on:click="print">LIST</v-btn> -->
            <v-btn color="indigo" dark small >List <v-icon dark right>mdi-arrow-right</v-icon></v-btn>
            
          </v-row>
          
          <!-- total calculation design -->
          <v-row justify="space-around" style="margin-top: 10px;">
            <p>Product List</p>

            <span class="text-right">
              <h5>Total</h5>
              <h6><input type="text" v-model="indianRupee(total)" class="cus-input" disabled></input></h6>
            </span> 
            
            <span class="text-right">
              <h6>Discount</h6>
              <h6><input type="text" v-model="discount" class="cus-input" @keypress="isNumber($event)"></input></h6>
            </span> 

            <span class="text-right">
              <h6>Net Weight</h6>
              <h6><input type="text" v-model="indianRupee(netAmount)" class="cus-input" disabled></input></h6>
            </span> 
          </v-row>

        <!-- table design -->
        <v-simple-table dense fixed-header height="400px" class="paleBlueRows" id="billingTable">
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Name</th>
                <th class="text-right">Rate</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in priceList" :key="item.id">
                <td>{{ item.name }}</td>
                <td class="text-right" style="white-space: nowrap;">{{ item.rate }} &#x20B9;</td>
                <td class="text-right" ><input type="text" class="cus-input" v-model="item.quantity" @keypress="isNumber($event)" @keyup="calculation(item)"></input></td>
                <td class="text-right">{{ indianRupee(item.amount) }} </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      <!-- </div> -->
        </v-container>
      </v-main>
    </v-app>
  </div>

  <script src="js/vue.js"></script>
  <script src="js/vuetify.js"></script>
  <script src="app.js"></script>
</body>
</html>