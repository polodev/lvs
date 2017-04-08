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
    }
  },
  actions: {

  }
})