<script>

import Editor from '@tinymce/tinymce-vue';
import { useToast } from "vue-toastification";
import api from '../api';

export default {
    name: 'Modal',
    components: {
        Editor
    },
    data() {
        return {
            email: {
                title: '',
                sender: '',
                recipient_list: '',
                body: ''
            }
        }
    },
    methods: {
        handlerSubmit(e) {
            e.preventDefault();
            const toast = useToast();
            let recipient_list = this.email.recipient_list.split('\n').join('');
            this.email = {...this.email, recipient_list}

            api.post('/emails', this.email).then(response => {
                toast.success("Solicitação de envio realizado com sucesso", {
                    timeout: 2000
                });
            }).catch(err => {
                toast.error("Erro ao encaminhar e-mails", {
                    timeout: 2000
                });
            });
        }
    },
  
}

</script>

<template>
  
    <form @submit="handlerSubmit">
        <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 h6" id="exampleModalLabel">Crie seu novo disparo</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row mb-3">
                        <div class="col-md-6  mb-2">
                            <label class="mb-1">Título</label>
                            <input type="text" v-model="email.title" placeholder="Preencha o título do email" class="form-control"  aria-label="Username" aria-describedby="basic-addon1"/>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-1">E-mail do remetente</label>
                            <input type="email" v-model="email.sender" placeholder="remetente@mail.com" class="form-control" aria-label="Username" aria-describedby="basic-addon1"/>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <label class="mb-1">E-mail dos destinatários</label>
                        <textarea v-model="email.recipient_list" placeholder="Insira os e-mails separados por vírgula" class="form-control"  aria-label="Username" aria-describedby="basic-addon1"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        
                        <Editor
                            v-model="email.body"
                            api-key="no-api-key"
                            :init="{
                            plugins: 'lists link image table code help wordcount'
                            }"
                        />
                    </div>
                  </div>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-dark">Criar agora</button>
                </div>
              </div>
            </div>
          </div>
    </form>
  
</template>