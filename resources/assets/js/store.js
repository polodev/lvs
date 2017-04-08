import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    auth: false,
    notifications: [],
    posts: [],
    authUser: {}
  },
  getters: {
    allNotifications(state) {
      return state.notifications;
    },
    allNotificationsCount (state) {
      return state.notifications.length;
    },
    posts (state) {
      return state.posts;
    },
    getAuthUser(state) {
      return state.authUser;
    }
  },
  mutations: {
    addNotification(state, notification) {
      return state.notifications.push(notification);
    },
    addFeed ( state, post) {
      return state.posts.push(post);
    },
    setAuthUserData (state, user) {
      return state.authUser = user;
    },
    updatePostLike(state, payload) {
      let post = state.posts.find(p => p.id === payload.id);
      console.log("post after finding",post);
      return post.likes.push(payload.like);
    },
    updatePostUnlike(state, payload) {
      let post = state.posts.find(p => p.id === payload.post_id);
      let like = post.likes.find(l => l.id === payload.like_id);
      var index = post.likes.indexOf(like)
      post.likes.splice(index, 1)
    },
    unlike_post(state, payload) {
          
          var post = state.posts.find((p) => {
                return p.id === payload.post_id
          })

          var like = post.likes.find( (l) => {
                return l.id === payload.like_id
          })

          var index = post.likes.indexOf(like)

          post.likes.splice(index, 1)
    }
  },
  actions: {

  }
})