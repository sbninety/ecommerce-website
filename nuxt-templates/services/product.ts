import { BaseService } from "./base.service";

export const useProductService = () => new ProductService();

class ProductService extends BaseService {
    constructor() {
        super();
    }

    public async getSpecialProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/special');
    }

    public async getSaleProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/sale');
    }

    public async getSuggestProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/suggest');
    }

    public async getProductBySlug(slug: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/' + slug);
    }

    public async getOtherProduct(): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/other');
    }

    public async getStore(slug: string): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/' + slug + '/store');
    }

    public async getAll(store_id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/store/' + store_id);
    }

    public async search(params: any): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/search', params);
    }

    public async updateStatus(params: any, id: number): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('api/v1/products/' + id, params);
    }

    public async delete(id: number): Promise<ApiResponse<any>> {
        return this.api.delete<ApiResponse<any>>('api/v1/products/' + id);
    }

    public async draftCreate(params: any): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/products/draft', params);
    }

    public async publishCreate(params: any): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/products/publish', params);
    }

    public async getProductEdit(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('/api/v1/products/' + id + '/edit');
    }

    public async getImages(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('api/v1/products/' + id + '/images');
    }

    public async getVariants(id: number): Promise<ApiResponse<any>> {
        return this.api.get<ApiResponse<any>>('api/v1/products/' + id + '/variants');
    }

    public async draftUpdate(params: any, id: number): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/products/' + id + '/draft', params);
    }

    public async publishUpdate(params: any, id: number): Promise<ApiResponse<any>> {
        return this.api.post<ApiResponse<any>>('/api/v1/products/' + id + '/publish', params);
    }
}