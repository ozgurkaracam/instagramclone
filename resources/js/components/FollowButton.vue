<template>
    <a href="#" class="btn btn-primary" v-on:click="toggle">{{ getText() }}</a>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                text:"Follow This User",
                status:false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props:['following','follower','csrf'],
        methods:{
          getText(){
              return this.status ? "Unfollow" : "Follow";
          },
            toggle(){
              if(this.status==false){
                  axios.post('http://localhost:8000/profile/'+this.follower+'/follow',this.following)
                  .then(res=> console.log(res))
                  .catch(err=>console.log(err));
              }
              this.status=!this.status;
            }

        },
        name:'FollowButton'
    }
</script>
