<template>
    
    <div class="grey-background">
    
        <h3>{{title}}</h3>
       
            <div class="container">
                <div class="card">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="headline" v-if="questions[0]">
                                   
                                    {{questions[0].question}}
                                       
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="questions[0]">
                            <div class="col">
                                <div class="row justify-content-center" v-for="n in 5" :key=n >
                                    
                                    <!-- TODO: dynamically get total number of scale choices -->
                                    <v-btn id="energyLevelQuestion"  v-on:click="handleButton($event)">{{questions[0].scale[6 - n]}}</v-btn>                                           
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col" v-if="this.energyQuestionTrigger == true">
                                        
                                <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.myBody.answers['Why is energy low?']"></v-text-field>
                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card top-padding">
                    <div class="container">
                        <div class="row" v-if="questions[0]">
                            <div class="col">
                                <div class="headline">
                                    {{questions[2].question}}

                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="questions[2]">
                            <div class="col">
                                <div class="row justify-content-center" v-for="n in 2" :key=n >
                                    <!-- TODO: dynamically get total number of scale choices -->
                                    <v-btn id="eatDrinkQuestion"   v-on:click="handleButton($event)">{{questions[2].scale[2 - n]}}</v-btn>
                                                                                   
                                </div>
                                
                                <div class="row" v-if="this.eatDrinkQuestionTrigger == true">
                                    
                                    <v-text-field box :label="questions[3].question" v-model="surveyAnswers.pages.myBody.answers['Why didnt I eat right?']"></v-text-field>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                    
                               
    </div>

</template>

<script>

export default {

    data: ()=> ({

        questions: {}, //question object for my body page
        energyQuestionTrigger: false,
        eatDrinkQuestionTrigger: false
    }),

    mounted() {

        this.questions = this.myBody.questions;
        console.log(this.questions);
    },

    props: {

        myBody : {},
        surveyAnswers: {},
        title: {

            type: String,
            default: 'My Body'
        }       
    },

    methods: {

        handleButton: function(buttonSource){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;
            
            
            if (targetID == "energyLevelQuestion")
            {
                if (targetContent == "Bad" || targetContent == "Terrible")
                {
                    this.energyQuestionTrigger = true;
                    console.log(targetContent);                   
                }
                else
                {
                    //reset values since text box is no longer valid
                    this.energyQuestionTrigger = false;
                    this.surveyAnswers.pages.myBody.answers['Why is energy low?'] = null;
                }

                this.surveyAnswers.pages.myBody.answers['How is my energy level?'] = targetContent;
                
            }
            else if(targetID == "eatDrinkQuestion")
            {
                if (targetContent == "No")
                {
                    this.eatDrinkQuestionTrigger = true;
                }
                else
                {
                    //reset values since text box is no longer valid
                    this.eatDrinkQuestionTrigger = false;
                    this.surveyAnswers.pages.myBody.answers['Why didnt I eat right?'] = null;
                }

                this.surveyAnswers.pages.myBody.answers['Did I eat and drink right?'] = targetContent;
            }
        }
        
    }
}
 

</script>