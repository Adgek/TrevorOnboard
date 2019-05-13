<!-- This component will house the 'plan' segment
     of the introduction
-->

<template>
    <div>
       
        <h3>{{title}}</h3>
            


        <v-card>
        <v-container fluid grid-list-lg>
          <v-layout row wrap>
            <v-flex xs12>
              <v-card color="white" class="black--text">
                <v-card-title primary-title>
                  <div>
                    <div class="headline">
                        <v-layout row justify-space-between>
                            <v-flex>
                                {{location}}
                            </v-flex>
                            <v-flex >
                                {{parsedDate}}
                            </v-flex>
                        </v-layout>
                        
                    </div>
                    
                  </div>
                </v-card-title>
                <v-card-title>
                    <div>
                        Focus
                    </div>
                </v-card-title>
                <v-card-actions>

                    <div v-for="focus in focuses" :key="focus">
                        <v-flex >
                            <v-btn disabled>{{focus}}</v-btn>

                        </v-flex>

                    </div>
                   
                </v-card-actions>
                <v-card-title>
                    <div>
                        Coach's Plan
                    </div>
                </v-card-title>
                <v-card-text>

                    <div>

                       {{notes}}
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

    props: {

        title: {
            type: String,
            default: 'The Plan'
        },

        location: {
            type: String,
            default: 'Chicopee'
        },

        focuses: {
            type: [Object, Array]

        },

        date: {
            type: String,
        },

        notes: {
            type: String,
            default: "No notes"
        }
        
    },

    data: ()=> ({
        parsedDate: null
    }),

    mounted() {
        this.parseDate(this.date);
        console.log('After');
        
        console.log(this.focuses);
        console.log('After');
        
    },

    

    methods: {
        parseDate: function(nonParsedDate) {
            this.parsedDate = nonParsedDate.slice(0, 10);
        }
    }

}
</script>