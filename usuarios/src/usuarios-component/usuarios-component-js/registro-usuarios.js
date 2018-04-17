class RegistroComponent extends Polymer.Element {
      static get is() { return 'registro-component'; }
      static get properties() {
        return {
          personas:{
            type:Object,
            notify:true,
            value:[]
          },
           persona: {
              type:Object,
              notify:true,
              value:{}
          },
          btntext:{
            type:String,
            notify:true,
            value:"Registrar"
          }
        };
      }

      registrar(){
        let request = this.$.apiProvider.registroPersona(this.persona);
        request.then((xhr) => {
          this.clear();
        });
      }

      clear(){
        if(!this.persona.id){
            this.persona = {};
        }
            this.$.apiProvider.listarPersonasDoRequest().then((xhr) => {
              this.personas = xhr.response.data;
            });
        }

    }

    window.customElements.define(RegistroComponent.is, RegistroComponent);