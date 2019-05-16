<template>
    <div>
        
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
                                            <v-btn id="personalQuestion" block  v-on:click="handleButton($event)">{{questions[0].scale[2 - n]}}</v-btn>
                                            
                                        
                                    </v-flex>
                                    <v-flex v-if="this.personalQuestionTrigger == true">
                                        <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.myMindset.answers['What did you want to tell coach?']"></v-text-field>
                                    </v-flex>
                                </div>
                            </v-card-actions>
                            
                        </v-card-text>
                    </v-card>
                    </v-flex>

                    <v-flex xs12>
                        <v-card>
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
                                    <v-flex v-for="n in 5" :key=n >
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn id="focusQuestion" block  v-on:click="handleButton($event)">{{questions[2].scale[6 - n]}}</v-btn>
                                            
                                        
                                    </v-flex>
                                    
                                </div>
                            </v-card-actions>
                            
                        </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex xs12>
                        <v-card>
                        <v-card-title primary-title class="justify-center">
                        <div>
                            <div class="headline">
                                <v-layout row  v-if="questions[3]">
                                    <v-flex >
                                        {{questions[3].question}}
                                    </v-flex>
                                    
                                    
                                </v-layout>
                            </div>
                            
                        </div>
                        
                        </v-card-title>

                        <v-card-text v-if="questions[3]" >
                            <v-card-actions class="justify-center" >
                                <div >
                                    <v-flex v-for="n in 5" :key=n >
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn id="confidentQuestion" block  v-on:click="handleButton($event)">{{questions[3].scale[6 - n]}}</v-btn>
                                            
                                        
                                    </v-flex>
                                    
                                </div>
                            </v-card-actions>
                            
                        </v-card-text>
                        </v-card>
                    </v-flex>
                    
                   
                    <v-flex xs12>
                        <v-card>
                        <v-card-title primary-title class="justify-center">
                        <div>
                            <div class="headline">
                                <v-layout row  v-if="questions[4]">
                                    <v-flex >
                                        {{questions[4].question}}
                                    </v-flex>
                                    
                                    
                                </v-layout>
                            </div>
                            
                        </div>
                        
                        </v-card-title>

                        <v-card-text v-if="questions[4]" >
                            <v-card-actions class="justify-center" >
                                <div >
                                    <v-flex v-for="n in 5" :key=n >
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn id="excitementQuestion" block  v-on:click="handleButton($event)">{{questions[4].scale[6 - n]}}</v-btn>
                                            
                                        
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
        personalQuestionTrigger: null
    }),

    mounted() {
        this.questions = this.myMindset.questions;
        console.log(this.questions);


    },

    props: {
        myMindset : {},
        surveyAnswers: {},
        title: {
            type: String,
            default: 'My Mindset'
        }

        
    },

    methods: {
        handleButton: function(buttonSource){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;
            
            if (targetID == "personalQuestion")
            {
                if (targetContent == "Yes")
                {
                    this.personalQuestionTrigger = true;        
                }

                this.surveyAnswers.pages.myMindset.answers['Anything to tell coach?'] = targetContent;

            }
            else if (targetID == "focusQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['Hows my focus'] = targetContent;
            }
            else if (targetID == "confidentQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['My confidence'] = targetContent;
            }
            else if (targetID == "excitementQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['My excitement'] = targetContent;
            }
            
        }
        
    }    
}
</script>