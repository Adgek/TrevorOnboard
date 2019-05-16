<template>
    <div class="grey-background top-padding">
        <h3>{{title}}</h3>

       
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
                <v-divider></v-divider>
                <v-card-title>
                  <div>
                    <v-layout row justify-space-between>
                      <v-flex>
                        Check In
                      </v-flex>
                      <v-flex>
                        Check Out
                      </v-flex>
                    </v-layout>
                  </div>
                  
                </v-card-title>
                <v-divider></v-divider>
                <v-card-title>
                    <div>
                        Insights
                    </div>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-title>
                    <div>
                        My focus today was...
                    </div>
                </v-card-title>
                <v-card-text>
                  <div>
                    {{lastDay.focus_today_answer}}
                  </div>
                </v-card-text>
                 <v-divider></v-divider>
                <v-card-title>
                    <div>
                        To be a better ski racer I can...
                    </div>
                </v-card-title>
                <v-card-text>
                  <div>
                    {{lastDay.better_today_answer}}
                  </div>
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
    parsedDate: null
  }),

  mounted() {
      this.parseDate(this.lastDay.date);
      console.log(this.lastDay.date);
      console.log(this.parsedDate);
      
      
  },

  props: {
    lastDay : {},
    title: {
      type: String,
      default: 'Last Day'
    },

    location: {
      type: String,
      default: 'Chicopee'
    }
  },

  methods: {
    parseDate: function(nonParsedDate) {
        this.parsedDate = nonParsedDate.slice(0, 10);
    }
  }
    
}
</script>