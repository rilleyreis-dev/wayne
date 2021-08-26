var url = "db/crud.php";

var app = new Vue({
    el: "#app",
    data: {
        sales:[],
        saleman:"",
        date:"",
    },
    methods: {

        //Listar Vendas
        listSales: function(){
            axios.post(url,{opt:2}).then(response=>{
                this.sales = response.data;
                console.log(this.sales);
            })
        },

        //limpar campos de busca
        clearSearch: function(){
            this.saleman = "";
            this.date = "";
        }

    },
    computed:{
        salesFiltered(){
            let tmpsales = [];
            let dataFormat = "";
            
            //verifica de foi selecionado uma data, em caso verdadeiro, formata a data para o padrão BR
            if(this.date != ""){
                let data = this.date.split("-");
                dataFormat = data[2] + "/" + data[1] + "/" + data[0];
            }

            //utiliza a fun;áo filter() no array sales[], para verificar se o valor dos campos para busca
            //contem dentro do array, se sim adiciona em um novo array
            tmpsales = this.sales.filter((item) => {
                return (
                    item.vendedor.toUpperCase().indexOf(this.saleman.toUpperCase()) > -1 &&
                    item.data.indexOf(dataFormat) > -1
                );
            });

            return tmpsales;
        }
    },

    //função para assim que a página foi criada
    created: function(){
        this.listSales();
    }
});