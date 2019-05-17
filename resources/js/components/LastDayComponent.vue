<template>
    
  <div class="grey-background top-padding">
    
    <h3>{{title}}</h3>

      
    <div class="container">
      
      <div class="card">
        
        <div class="container">
          <div class="row">
                        
            <div class="col">
                
                <div class="headline">
                    *Icon* {{discipline}}
                </div>
                    
            </div>
    
            <div class="col">
                <div class="headline">
                    {{location}}
                </div>
            </div>

            <div class="col">
                <div class="headline">
                    {{parsedDate}}
                </div>
            </div>

        
          </div>

          <div class="row">
            
            <div class="col">
              Check In
            </div>
      
            <div class="col">
              Check Out
            </div>

          </div>
          <v-divider></v-divider>
          <div class="row">
            <div class="col">
              <div class="headline">
                Insights
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              My focus today was...
      
            </div>
          </div>

          <div class="row">

            <div class="col">
              {{lastDay.focus_today_answer}}
          
            </div>
          </div>
          <div class="row">
            <div class="col">
              To be a better ski racer I can...

            </div>
          </div>
          
          <div class="row">
            <div class="col">
              {{lastDay.better_today_answer}}
              

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

    parsedDate: null //parsed date to get correct date format from date structure
  
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

    discipline: {
      type: String,
      default: 'SL'
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