new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data:{
        customeName: '',
        place: '',
        mobileNum:'',
        total: 0,
        discount: '',
        netAmount: 0,
        billData:[],
        priceList: [
            {
              id:1,
              name: "3 1/2\" LAKSHMI",
              rate: 8,
              quantity: '',
              amount: 0
            },
            {
              id:2,
              name: "4\" LAKSHMI",
              rate: 12,
              quantity: '',
              amount: 0
            },
            {
              id:3,
              name: "4\" SPL GOLD LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:4,
              name: "4\" DLX LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:5,
              name: "2 3/4 KURUVI ",
              rate: 6,
              quantity: '',
              amount: 0
            },
            {
              id:6,
              name: "3 1/2\" LAKSHMI",
              rate: 8,
              quantity: '',
              amount: 0
            },
            {
              id:7,
              name: "4\" LAKSHMI",
              rate: 12,
              quantity: '',
              amount: 0
            },
            {
              id:8,
              name: "4\" SPL GOLD LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:9,
              name: "4\" DLX LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:10,
              name: "2 3/4 KURUVI ",
              rate: 6,
              quantity: '',
              amount: 0
            },
            {
              id:11,
              name: "3 1/2\" LAKSHMI",
              rate: 8,
              quantity: '',
              amount: 0
            },
            {
              id:12,
              name: "4\" LAKSHMI",
              rate: 12,
              quantity: '',
              amount: 0
            },
            {
              id:13,
              name: "4\" SPL GOLD LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:14,
              name: "4\" DLX LAKSHMI",
              rate: 19,
              quantity: '',
              amount: 0
            },
            {
              id:15,
              name: "2 3/4 KURUVI ",
              rate: 6,
              quantity: '',
              amount: 0
            },
            
          ],
    },
    methods:{
       clearFields: function(){
           this.customeName = "",
           this.place = "",
           this.mobileNum = "",
           this.total = 0,
           this.netAmount = 0,
           this.discount = '',
           this.priceList.forEach(element => {
            element.quantity = '';
            element.amount = 0 ;
          });
       },
       close: function(){
        window.close();
       },
       isNumber: function(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
          evt.preventDefault();;
        } else {
          return true;
        }
      },
      indianRupee:function(amount){
          return amount.toLocaleString('en-IN');
      },
      calculation: function(item){
        this.total=0;
        this.netAmount = 0;
        this.billData = [];
        item.amount = item.rate * item.quantity;
        this.priceList.forEach(element => {
          this.total += element.amount;
          if(element.quantity != null && element.quantity > 0){
            this.billData.push(element);
          }
          
        });
        this.netAmount = this.total - this.discount;
      },
      print:function(){
        
      }
    },
    watch: {
      discount(newValue) {
        this.netAmount = this.total - newValue;
      }
    }
  });