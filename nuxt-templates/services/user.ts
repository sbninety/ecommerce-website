import { BaseService } from "~/services/base.service";
import type { User } from "~/types/models/user";

export const useUserService = () => new UserService()

class UserService extends BaseService {
    constructor() {
        super();
    }

    public async me(): Promise<ApiResponse<User>> {
        return await this.api.get<ApiResponse<User>>('/api/admin/profile')
    }

    public async add(params?: object): Promise<ApiResponse<any>> {
        return await this.api.post<ApiResponse<any>>('/api/v1/register', params)
    }

    public async updateProfile(params?: object): Promise<ApiResponse<any>> {
        return await this.api.put<ApiResponse<any>>('/api/admin/update-profile', params)
    }

    public async getInfo(): Promise<ApiResponse<User>> {
        return await this.api.get<ApiResponse<User>>('/api/v1/info')
    }
}
