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
                                <v-layout row  v-if="goals[1]">
                                    <v-flex >
                                        What is your skiing goal today?
                                    </v-flex>
                                    
                                    
                                </v-layout>
                            </div>
                            
                        </div>
                        
                        </v-card-title>
                        
                        <v-card-text v-if="goals[1]" >
                            <v-card-actions class="justify-center" >
                                <div >
                                    <v-flex >
                                        <!-- Load array into drop down -->
                                        <v-select :items="goals" box label="Select a goal" v-model="surveyAnswers.pages.goals.answers['My skiing goal today?']"></v-select>
                                            
                                        
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
        goals: [], //goal object (needs to be an array for the drop down menu)
        equipmentQuestionTrigger: false
    }),

    mounted() {
        this.goals = Object.values(this.myGoals.goals);
        console.log(this.goals);


    },

    props: {
        myGoals : {},
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
            
            
            
        }
        
    }    
}
</script>