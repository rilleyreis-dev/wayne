var url = "db/crud.php";

var app = new Vue({
    el:"#app",
    data:{
        saleman:"",
        product: "",
        price: "",
        amount: "",
        subtotal: 0,
        auxTotal: 0,
        items: [],
        item:{
            name: "",
            value: "",
            count: ""
        },
        money: {
            decimal: ',',
            thousands: '.',
            prefix: 'R$ ',
            suffix: '',
            precision: 2,
            masked: false /* doesn't work with directive */
          }
    },
    methods: {
        addItem(){
            this.price = this.price.replace('R$ ', '');
            this.price = this.price.replace('.', '');
            this.item={
                name: this.product.toUpperCase(),
                value: this.price.replace(',', '.') ,
                count: this.amount
            };
            this.subtotal = this.subtotal + (this.price.replace(',', '.') * this.amount);
            this.items.push(this.item);
            this.product = '';
            this.price = '';
            this.amount = '';
            this.auxTotal = 0;
            this.item={
                name: "",
                value: "",
                count: ""
            }
            document.getElementById("product").focus();
        },
        newSale: function(){

            axios.post(url,{opt:1,items:this.items,saleman:this.saleman,total:this.subtotal});
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                willClose: () => {
                  window.location.href = 'http://localhost/wayne';
                }
              })
              
              Toast.fire({
                icon: 'success',
                title: 'Venda Salva com sucesso'
              })
        }
    }
});