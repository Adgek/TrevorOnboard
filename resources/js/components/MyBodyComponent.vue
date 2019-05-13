<template>
    <div>
        <h3>{{title}}</h3>

        <v-card>
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
                                <div>
                                    <v-flex v-for="n in 5" :key=n >
                                        <!-- TODO: dynamically get total number of scale choices -->
                                            <v-btn block>{{questions[0].scale[6 - n]}}</v-btn>
                                            
                                        
                                    </v-flex>
                                </div>
                            </v-card-actions>
                            
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-title>
                            <div>
                            </div>
                        </v-card-title>
                        <v-card-text>
                        <div>
                        </div>
                        </v-card-text>
                        
                        
                    </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
</template>

<script>
export default {

    data: ()=> ({
        questions: {} //question object for my body page
    }),

    mounted() {
        this.questions = this.myBody.questions;
        console.log(this.questions);


    },

    props: {
        myBody : {},
        title: {
            type: String,
            default: 'My Body'
        }

        
    },

    methods: {
        
        }
}
 

</script>