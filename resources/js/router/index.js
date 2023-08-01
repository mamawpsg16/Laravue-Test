import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
      {
        path: '/',
        children: [
            {
                path: '',
                name:'posts',
                component: () => import('@/views/apps/Post/PostIndex.vue')
            },
            {
                path: 'post/:id',
                name:'post-details',
                component: () => import('@/views/apps/Post/PostDetails.vue')
            }
        ]
      },
      {
        path: '/test',
        name:'test',
        component: () => import('@/views/apps/Test.vue')
      },
      {
        path: '/test-1',
        name:'test-1',
        component: () => import('@/views/apps/Test1.vue')
      },
      {
        path: '/challenge-1',
        name:'challenge-1',
        component: () => import('@/views/apps/Challenge.vue')
      },
      { 
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: () => import('@/views/apps/errors/NotFound.vue')
    },
    ],
  })

export default router;