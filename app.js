const { createApp, ref } = Vue

const app = createApp({
    setup() {
      const message = ref('Agenda')
      return {
        message
      }
    },
    data () {
        return {
          tipoagendas: null,
          selected: 1,
          agendas: null,
          modalNuevo:false,
          modalConfirmar:false,
          tipoagenda:{
            tipoagenda_id:0,
            descripcion:""
          },
          agenda:{
            agenda_id:0,
            agenda_descripcion:"",
            fecha_inicio:"",
            fecha_fin:""
          }
        }
    },
    mounted () {
        this.getTipoagenda(),
        this.getInfo()
    },
    methods:{
        getTipoagenda(){
            axios.get('http://localhost/labogen/apitipoagenda.php')
            .then(response => (this.tipoagendas = response.data))
        },
        getInfo(){
            axios.get('http://localhost/labogen/api.php')
            .then(response => (this.agendas = response.data))
        },
        guardar(){
            
            if(app.agenda.agenda_id==0)
            {
                axios.post('http://localhost/labogen/api.php',{"tipoagenda_id":document.getElementById("tipoagenda_id").value, "agenda_descripcion":document.getElementById("agenda_descripcion").value, "fecha_inicio":document.getElementById("fecha_inicio").value, "fecha_fin":document.getElementById("fecha_fin").value})
                .then(function(response){
                    console.log(response.data)
                    app.getInfo()
                })
            }
            else
            {
                axios.put('http://localhost/labogen/api.php',{"agenda_id":app.agenda.agenda_id,"tipoagenda_id":document.getElementById("tipoagenda_id").value, "agenda_descripcion":document.getElementById("agenda_descripcion").value, "fecha_inicio":document.getElementById("fecha_inicio").value, "fecha_fin":document.getElementById("fecha_fin").value})
                .then(function(response){
                    console.log(response.data)
                    app.getInfo()
                })
            }
        },
        nuevo(){
            app.modalNuevo=true,
            app.agenda.agenda_id=0,
            app.agenda.agenda_descripcion=""
            app.agenda.fecha_inicio="",
            app.agenda.fecha_fin=""
        },
        seleccionar(agenda){
            app.modalNuevo=true;
            app.selected= agenda.tipoagenda_id,
            app.agenda=agenda
        },
        seleccionarConfirmar(agenda){
            app.modalConfirmar=true;
            app.agenda=agenda
        },
        eliminar(){
            axios.delete('http://localhost/labogen/api.php', {data:{ "agenda_id":app.agenda.agenda_id }})
            .then(function(response){
                console.log(response.data)
                app.getInfo()
            })
        }
    }

  }).mount('#app')


