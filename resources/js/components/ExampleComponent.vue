<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Main Vue</div>

                    <div class="card-body">
                        This is the main vue
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    export default {

       data: ()=>({
            
            surveyJson: null,
            jsonObject: {},
            survey: {
                pages: null,
            }
            
        }),

        methods: {
                    getSurveyObject() {
                        
                        axios.get('/SendCheckInInfo').then((response) => {
                            this.surveyJson = response.data.survey;
                            //this.jsonObject = JSON.parse(response.data);
                            //this.survey = response.data;    
                            console.log(response.data);
                            console.log(this.surveyJson);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    },

                    testFunction() {
                        axios.get('/SanityCheck').then(function(response) {
                            console.log(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                        console.log("Test function worked bro!");
                    }
        },

        mounted() {
            console.log('Component mounted.');
            this.getSurveyObject();
            this.testFunction();
        },
        
        
           
       
       
    }
</script>