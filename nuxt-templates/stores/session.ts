import { defineStore } from 'pinia'
import type { User } from "~/types/models/user";

export const useSessionStore = defineStore({
    id: 'session-store',
    state: () => ({
        token: null,
        _user: {} as User
    }),
    actions: {
        setUser(user: User) {
            this._user = user
        },
        setToken(value: any) {
            localStorage.removeItem("token")

            localStorage.setItem("token", value);

            this.$state.token = value;
        },
        async fetchUser() {
            // const authService = useAuthService()
            // const res = await authService.me()

            // if (!res.success) {
            //     //@TODO: alert user
            //     throw 'Server error'
            // }

            // this.setUser(res.result)

        },
        async logout() {
            // const authService = useAuthService()

            try {
                // await authService.logout()
                // window.location.assign('login')
                this.clear()

            } catch (e) {
                // const { $alertError } = useAlert()
                // const { trans } = useTrans()

                // $alertError(trans('INF_COM_0004'))
                console.log(e);
            }
        },
        async clear() {
            const route = useRoute()
            this.setUser({} as User)

            localStorage.removeItem('token')

            if (route.path !== '/login') {
                window.location.assign('/login')
            }

        }
    },
    getters: {
        user: (state): User => state._user,
        isLoggedIn: (state): boolean => Object.keys(state._user).length > 0,
    },
    persist: true
})
