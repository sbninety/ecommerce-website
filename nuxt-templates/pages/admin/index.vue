<template>
  <AdminLayout>
    <div class="w-full bg-[#F6F6F6] py-[30px]">
      <div class="w-[1000px] mx-auto flex gap-[30px]">
        <div class="max-w-[700px] w-full flex flex-col gap-[30px]">
          <div class="bg-white px-5 pt-5 pb-[17px]">
            <p class="text-[20px] font-bold">Danh sách cần làm</p>
            <p class="mt-[5px] text-[14px] text-[#00000099]">
              Những việc bạn sẽ phải làm
            </p>
            <div class="grid grid-cols-4">
              <div class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px]">
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">
                  Chờ Xác Nhận
                </p>
              </div>
              <div class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px]">
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">
                  Chờ Lấy Hàng
                </p>
              </div>
              <div class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px]">
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">Đã Xử Lý</p>
              </div>
              <div class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px]">
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">Đơn Hủy</p>
              </div>
              <div
                class="h-[75px] mt-2.5 text-center pt-2.5 px-[15px] leading-[16.94px]"
              >
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">
                  Trả Hàng/Hoàn Tiền Chờ xử lý
                </p>
              </div>
              <div
                class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px] px-[23px]"
              >
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">
                  Sản Phẩm Bị Tạm Khóa
                </p>
              </div>
              <div class="h-[75px] mt-2.5 text-center pt-2.5 leading-[16.94px]">
                <p class="text-[20px] text-[#007006] font-bold">0</p>
                <p class="text-[14px] text-[#00000099] mt-[5px]">
                  Sản Phẩm Hết Hàng
                </p>
              </div>
            </div>
          </div>
          <div class="bg-white px-5 pt-5">
            <div>
              <span class="text-[20px] font-bold leading-[24.2px]"
                >Phân tích bán hàng</span
              >
              <span
                class="text-[12px] text-[#00000099] ml-2.5 leading-[14.52px]"
                >( Hôm nay 00:00 GTM+7 19:00 )</span
              >
            </div>
            <div
              class="mt-[5px] text-[12px] text-[#00000099] leading-[14.52px]"
            >
              Tổng quan dữ liệu của shop đối với đơn hàng đã xác nhận
            </div>
            <div class="mt-2.5 pt-[60px] pb-[30px] flex">
              <div class="w-full">
                <div>
                  <div class="flex items-center gap-[5px]">
                    <div class="text-[12px] text-[#000000B2] leading-[14.52px]">
                      Doanh số
                    </div>
                    <div>
                      <img src="~/assets/images/question 1.png" width="10" />
                    </div>
                  </div>
                  <div
                    class="font-bold text-[16px] mt-2.5 mb-[5px] leading-[19.36px]"
                  >
                    0
                  </div>
                </div>
                <div class="mt-[16px] ml-[6px]">
                  <img src="~/assets/images/Graph.png" width="267" />
                </div>
              </div>
              <div class="w-full">
                <div class="border-b border-[#0000001A] flex pb-5">
                  <div class="w-full flex flex-col gap-2.5 pb-[6px]">
                    <div class="flex items-center gap-[5px]">
                      <div
                        class="text-[12px] text-[#000000B2] leading-[14.52px]"
                      >
                        Lượt truy cập
                      </div>
                      <div>
                        <img src="~/assets/images/question 1.png" width="10" />
                      </div>
                    </div>
                    <div class="font-bold text-[16px] leading-[19.36px]">0</div>
                    <div class="text-[12px] text-[#00000066] leading-[14.52px]">
                      Vs hôm qua 0,00 % --
                    </div>
                  </div>
                  <div class="w-full flex flex-col gap-2.5 pb-[6px]">
                    <div class="flex items-center gap-[5px]">
                      <div
                        class="text-[12px] text-[#000000B2] leading-[14.52px]"
                      >
                        Lượt xem
                      </div>
                      <div>
                        <img src="~/assets/images/question 1.png" width="10" />
                      </div>
                    </div>
                    <div class="font-bold text-[16px] leading-[19.36px]">0</div>
                    <div class="text-[12px] text-[#00000066] leading-[14.52px]">
                      Vs hôm qua 0,00 % --
                    </div>
                  </div>
                </div>
                <div class="flex mt-5">
                  <div class="w-full flex flex-col gap-2.5 pb-[6px]">
                    <div class="flex items-center gap-[5px]">
                      <div
                        class="text-[12px] text-[#000000B2] leading-[14.52px]"
                      >
                        Đơn hàng
                      </div>
                      <div>
                        <img src="~/assets/images/question 1.png" width="10" />
                      </div>
                    </div>
                    <div class="font-bold text-[16px] leading-[19.36px]">0</div>
                    <div class="text-[12px] text-[#00000066] leading-[14.52px]">
                      Vs hôm qua 0,00 % --
                    </div>
                  </div>
                  <div class="w-full flex flex-col gap-2.5 pb-[6px]">
                    <div class="flex items-center gap-[5px]">
                      <div
                        class="text-[12px] text-[#000000B2] leading-[14.52px]"
                      >
                        Tỷ lệ chuyển đổi
                      </div>
                      <div>
                        <img src="~/assets/images/question 1.png" width="10" />
                      </div>
                    </div>
                    <div class="font-bold text-[16px] leading-[19.36px]">
                      0,00%
                    </div>
                    <div class="text-[12px] text-[#00000066] leading-[14.52px]">
                      Vs hôm qua 0,00 % --
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-[270px] bg-white pb-5">
          <div class="h-[60px] flex items-center justify-between px-5">
            <div class="text-[20px] font-bold">Thông Báo</div>
            <div class="text-[16px] text-[#007006]">Xem thêm</div>
          </div>
          <div class="mt-5 px-5">
            <div class="text-[14px] font-bold leading-[16.94px] w-[185px]">
              Các Kênh Thông Tin Chính Thống Từ Shoop
            </div>
            <div class="text-[14px] text-[#00000099] leading-[16.94px] mt-2.5">
              Lừa đảo bằng việc mạo danh Shopee cung cấp các dịch vụ có thu phí
              nhằm mục đích trục lợi cá nhân đang dần trở nên phổ biến.
            </div>
            <div class="mt-2.5 text-[12px] pb-[5px]">
              <span class="text-[#007006]">Mới</span>
              <span class="ml-2.5 text-[#00000066]">Hôm Nay 00:00</span>
            </div>
          </div>
          <div class="mt-2.5 px-5">
            <div class="text-[14px] font-bold leading-[16.94px] w-[185px]">
              Các Kênh Thông Tin Chính Thống Từ Shoop
            </div>
            <div class="text-[14px] text-[#00000099] leading-[16.94px] mt-2.5">
              Lừa đảo bằng việc mạo danh Shopee cung cấp các dịch vụ có thu phí
              nhằm mục đích trục lợi cá nhân đang dần trở nên phổ biến.
            </div>
            <div class="mt-2.5 text-[12px] pb-[5px]">
              <span class="text-[#007006]">Mới</span>
              <span class="ml-2.5 text-[#00000066]">Hôm Nay 00:00</span>
            </div>
          </div>
          <div class="mt-2.5 px-5">
            <div class="text-[14px] font-bold leading-[16.94px] w-[185px]">
              Các Kênh Thông Tin Chính Thống Từ Shoop
            </div>
            <div class="text-[14px] text-[#00000099] leading-[16.94px] mt-2.5">
              Lừa đảo bằng việc mạo danh Shopee cung cấp các dịch vụ có thu phí
              nhằm mục đích trục lợi cá nhân đang dần trở nên phổ biến.
            </div>
            <div class="mt-2.5 text-[12px] pb-[5px]">
              <span class="text-[#007006]">Mới</span>
              <span class="ml-2.5 text-[#00000066]">Hôm Nay 00:00</span>
            </div>
          </div>
          <div class="mt-2.5 px-5">
            <div class="text-[14px] font-bold leading-[16.94px] w-[185px]">
              Các Kênh Thông Tin Chính Thống Từ Shoop
            </div>
            <div class="text-[14px] text-[#00000099] leading-[16.94px] mt-2.5">
              Lừa đảo bằng việc mạo danh Shopee cung cấp các dịch vụ có thu phí
              nhằm mục đích trục lợi cá nhân đang dần trở nên phổ biến.
            </div>
            <div class="mt-2.5 text-[12px] pb-[5px]">
              <span class="text-[#007006]">Mới</span>
              <span class="ml-2.5 text-[#00000066]">Hôm Nay 00:00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from "~/layouts/Admin.vue";
</script>
