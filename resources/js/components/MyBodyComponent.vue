<template>
    
    <div class="grey-background">
    
        <h3>{{title}}</h3>
       
        <v-container fluid grid-list-lg>
    
            <v-layout row wrap>

                <v-flex xs12>
                
                    <v-card color="white" class="black--text">
                
                        <v-card-title primary-title class="justify-center">
                
                            <div>
                        
                                <div class="headline">
                        
                                    <v-layout row  v-if="questions[0]">
                                        
                                        <v-flex >
                                            {{questions[0].question}}
                                        </v-flex>                                   
                                    
                                    </v-layout>
                            
                                </div>
                            
                            </div>
                        
                        </v-card-title>
                        
                        <v-card-text v-if="questions[0]" >
                        
                            <v-card-actions class="justify-center" >
                        
                                <div >
                        
                                    <v-flex v-for="n in 5" :key=n >
                                        
                                        <!-- TODO: dynamically get total number of scale choices -->
                                        <v-btn id="energyLevelQuestion" block  v-on:click="handleButton($event)">{{questions[0].scale[6 - n]}}</v-btn>                                           
                                        
                                    </v-flex>
                                    
                                    <v-flex v-if="this.energyQuestionTrigger == true">
                                        
                                        <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.myBody.answers['Why is energy low?']"></v-text-field>
                                    
                                    </v-flex>
                                
                                </div>
                            
                            </v-card-actions>
                            
                        </v-card-text>
                    
                    </v-card>
                   
                </v-flex>
                
                <v-flex xs12>
                    
                    <v-card color="white" class="black--text">                
                        
                        <v-card-title primary-title class="justify-center">
                            
                            <div>
                            
                                <div class="headline">
                                    
                                    <v-layout row  v-if="questions[0]">
                                    
                                        <v-flex >
                                            {{questions[2].question}}
                                        </v-flex>
                                                           
                                    </v-layout>
                                </div>
                            
                            </div>
                        
                        </v-card-title>
                        
                        <v-card-text v-if="questions[2]" >
                        
                            <v-card-actions class="justify-center" >
                        
                                <div >
                        
                                    <v-flex v-for="n in 2" :key=n >
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn id="eatDrinkQuestion" block  v-on:click="handleButton($event)">{{questions[2].scale[2 - n]}}</v-btn>
                                                                                   
                                    </v-flex>
                                    
                                    <v-flex v-if="this.eatDrinkQuestionTrigger == true">
                                        
                                        <v-text-field box :label="questions[3].question" v-model="surveyAnswers.pages.myBody.answers['Why didnt I eat right?']"></v-text-field>
                                    
                                    </v-flex>
                                
                                </div>
                            
                            </v-card-actions>
                            
                        </v-card-text>
                        
                        
                    </v-card>
        
                </v-flex>                   
        
            </v-layout>
        
        </v-container>
        
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