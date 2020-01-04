<template>
    <a href="#" class="btn btn-primary" v-on:click="toggle">{{ getText }}</a>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                text:"Follow This User",
                // status:false,
            }
        },
        props:['following','follower','status'],
        methods:{

            toggle(){
              if(this.status==false){
                  axios.post('http://localhost:8000/profile/'+this.follower+'/follow',this.following)
                  .then(res=> {
                      this.status=!this.status;
                      console.log(res);
                  })
                  .catch(err=>console.log(err));
              }
              else{
                  axios.post('http://localhost:8000/profile/'+this.follower+'/unfollow',this.following)
                      .then(res=> {
                          this.status=!this.status;
                          console.log(res);
                      })
                      .catch(err=>console.log(err));
              }

            }

        },
        name:'FollowButton',
        computed:{
            getText(){
                return this.status==true ? "Unfollow" : "Follow";
            },
        }

    }
</script>
