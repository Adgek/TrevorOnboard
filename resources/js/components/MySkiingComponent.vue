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
            
                                    <v-flex v-for="n in 2" :key=n >
            
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn id="equipmentQuestion" block  v-on:click="handleButton($event)">{{questions[0].scale[2 - n]}}</v-btn>
                                            
                                    </v-flex>

                                    <v-flex v-if="this.equipmentQuestionTrigger == true">

                                        <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.mySkiing.answers['Why is your equipment not ready?']"></v-text-field>

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
                            
                                    <v-layout row  v-if="questions[2]">
                            
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
                                   
                                    <v-flex>
                                        <v-text-field box :label="questions[2].question" v-model="surveyAnswers.pages.mySkiing.answers['Todays focus?']"></v-text-field>
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
        equipmentQuestionTrigger: false
    }),

    mounted() {

        this.questions = this.mySkiing.questions;
        console.log(this.questions);
    },

    props: {

        mySkiing : {},
        surveyAnswers: {},
        title: {

            type: String,
            default: 'My Skiing'
        }

        
    },

    methods: {

        handleButton: function(buttonSource){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;
            
            if (targetID == "equipmentQuestion")
            {
                if (targetContent == "No")
                {
                    this.equipmentQuestionTrigger = true;        
                }

                this.surveyAnswers.pages.mySkiing.answers['Equipment Ready?'] = targetContent;

            }
            
        }
        
    }    
}

</script>