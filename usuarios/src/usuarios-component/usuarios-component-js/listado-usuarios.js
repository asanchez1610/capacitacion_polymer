class ListadoComponent extends Polymer.Element {
      static get is() { return 'listado-component'; }
      static get properties() {
        return {
          personas:{
            type:Object,
            notify:true,
            value:[]
          },
          persona:{
            type:Object,
            notify:true,
            value:{}
          },
          btntext:{
            type:String,
            notify:true,
            value:"Registrar"
          },
          personaEliminar:{
            type:Object,
            notify:true,
            value:{}
          },
          idPersona : {
            type  : String,
            notify:true
          }
        };
      }

      connectedCallback (){
          super.connectedCallback();
          this.personas = [];
          this.listarPersonas();
      }

      listarPersonas(){
         let request = this.$.apiProvider.listarPersonasDoRequest();
         request.then((xhr) => {
                 this.personas = xhr.response.data;
          });
      }

      rowSelection(e){
        let chk = e.path[1].querySelectorAll('.chkselected')[0];
        let row = e.path[1];
        let chks = this.clearCheckbox();
        this.printSelected(chks,row,chk);
      }

      clearPersona(){
         this.persona = {};
         this.btntext = "Registrar";
      }

      printSelected(chks,row,chk,isSeleccionar){

        var rows = this.shadowRoot.querySelectorAll('.bg-selected');
        if(!row.parentNode){
          for (let itemRow of rows) {
              itemRow.classList.remove("bg-selected");
          }
          return;
        }

        if(row.parentNode && row.parentNode.classList && row.parentNode.classList.contains && row.parentNode.classList.contains('itemRow')){
          row = row.parentNode;
        }

        var seleccionado = row.classList.contains('bg-selected');
          
        for (let itemRow of rows) {
            itemRow.classList.remove("bg-selected");
        }

        if(seleccionado){
            chk.removeAttribute('checked');
            chk.checked = false;
            this.clearPersona();
        }else{
            chk.setAttribute("checked","checked");
            chk.checked = true;
            row.classList.add("bg-selected");
            if(row.dataset.persona){
              let personaTemp = JSON.parse(row.dataset.persona);
              this.persona = personaTemp;
            }
            this.btntext = "Actualizar";
         }

      }

      clearCheckbox(chk){
        var chks = this.shadowRoot.querySelectorAll('.chkselected');

          for (let itemChk of chks) {
              itemChk.removeAttribute("checked");
              itemChk.checked = false;
          }
          return chks;
      }

      confirmarEliminacion(e){
        this.personaEliminar = e.model.__data.item;
        this.$.confirmacion.open();
      }

      eliminar(){
        if(this.personaEliminar){
          this.idPersona = this.personaEliminar.id;
          this.$.confirmacion.close();   
          let request = this.$.apiProvider.eliminarPersona();
          request.then((xhr) => {
            this.listarPersonas();
            this.clearPersona();
          });

        }
      }

      
    }

    window.customElements.define(ListadoComponent.is, ListadoComponent);