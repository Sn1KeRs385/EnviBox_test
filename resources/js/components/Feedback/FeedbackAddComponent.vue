<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-header">Оставте ваш отзыв</div>

                    <div class="card-body">
                        <form>
                            <div class="col-xs-12 form-group" v-if="errors.length">
                                <b>Пожалуйста исправьте указанные ошибки:</b>
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Имя</label>
                                <input type="text" v-model="Feedback.Name" class="form-control">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Номер телефона</label>
                                <input type="text" v-model="Feedback.TelephoneNumber" class="form-control">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Отзыв</label>
                                <textarea v-model="Feedback.FeedbackText" class="form-control" rows="13"></textarea>
                            </div>
                            <div class="col-xs-12 form-group">
                                <div class="custom-control custom-radio" v-for="savertype in savertypes">
                                    <input type="radio" v-model="SaverType" :value="savertype.Name" name="groupOfDefaultRadios">
                                    <label>{{savertype.Description}}</label>
                                </div>
                            </div>
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-success" v-on:click="SubmitFeedback">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'savertypes'
        ],
        data() {
            return {
                Feedback: {
                    Name: null,
                    TelephoneNumber: null,
                    FeedbackText: null,
                },
                SaverType: null,
                errors:[]
            }
        },
        methods: {
            SubmitFeedback() {
                event.preventDefault();
                this.CheckForm();
                if(this.errors.length){
                    return false;
                }

                axios.post("/Feedback/Add",
                        {
                            Feedback: this.Feedback,
                            SaverType: this.SaverType
                        })
                    .then(function (response) {
                        alert(response.data['Message']);
                    })
                    .catch(function () {
                        alert("При отправке отзыва произошла ошибка, попробуйте позже");
                    });
            },
            CheckForm() {
                this.errors = [];
                this.CheckName();
                this.CheckTelephoneNumber();
                this.CheckFeedbackText();
                this.CheckRadio();
            },
            CheckName(){
                if(!this.Feedback.Name) {
                    this.errors.push("Имя не задано!");
                }
            },
            CheckTelephoneNumber(){
                if(!this.Feedback.TelephoneNumber){
                    this.errors.push("Номер телефона не задан!");
                } else{
                    var TelephoneRegExp = /^(\\+7|8)[^a-zA-ZА-Яа-я0-9]*[0-9]{0,3}[^a-zA-ZА-Яа-я0-9]*[0-9]{0,3}[^a-zA-ZА-Яа-я0-9]*[0-9]{0,3}[^a-zA-ZА-Яа-я0-9]*[0-9]{0,3}$/iu;
                    if(!TelephoneRegExp.test(this.Feedback.TelephoneNumber)){
                        this.errors.push("Номер телефона зада не корректно <br> попробуйте ввести в формате 89123456789");
                    }
                }
            },
            CheckFeedbackText(){
                if(!this.Feedback.FeedbackText){
                    this.errors.push("Отзыв не может быть пуст!");
                }
            },
            CheckRadio(){
                if(!this.SaverType){
                    this.errors.push("Сделай выбор, как оставить отзыв!");
                }
            }
        }
    }
</script>

<style scoped>
    textarea{
        resize:none;
    }
</style>