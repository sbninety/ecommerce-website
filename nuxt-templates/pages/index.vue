<template>
  <DefaultLayout>
    <SliderMain />
    <SliderCategories
      :categories="categories"
      itemsPerSlide="10"
      type="Category"
    />
    <SliderProducts
      :products="specialProducts"
      itemsPerSlide="4"
      type="ProductHot"
      title="THƯƠNG HIỆU NỔI BẬT"
    />
    <div class="max-w-[1200px] w-full mx-auto">
      <img src="~/assets/images/image 14.png" />
    </div>
    <SliderProducts
      :products="saleProducts"
      itemsPerSlide="4"
      type="Product"
      title="ƯU ĐÃI SHOOP"
    />
    <div class="max-w-[1200px] w-full mx-auto">
      <img src="~/assets/images/image 13.png" />
    </div>
    <div class="max-w-[1200px] w-full mx-auto bg-white mb-[78px]">
      <div class="text-[24px] font-bold pl-2.5 pt-[30px] pb-[5px]">
        <p>GỢI Ý HÔM NAY</p>
      </div>
      <div class="h-[4px] bg-[#007006]" />
      <div class="grid grid-cols-4">
        <div
          v-for="product in suggestProducts"
          :key="product"
          class="mt-[30px]"
        >
          <CardProduct :product="product" />
        </div>
      </div>
    </div>
    <div
      id="IntroduceLinks"
      class="w-full bg-white border-t-4 border-t-[#007006]"
    >
      <div class="max-w-[1200px] mx-auto w-full">
        <div class="pt-[70px] pb-[74px] border-b border-[#0000001A]">
          <p class="font-bold text-[14px]">
            SHOOP - GÌ CŨNG CÓ, MUA HẾT Ở SHOOP
          </p>
          <p class="mt-5 text-[#000000DE] text-[14px] leading-5 mr-[40px]">
            <span class="font-bold">Shoop</span> - ứng dụng mua sắm trực tuyến
            thú vị, tin cậy, an toàn và miễn phí! Shoop là nền tảng giao dịch
            trực tuyến hàng đầu ở Đông Nam Á, có trụ sở chính ở Singapore, đã có
            mặt ở khắp các khu vực Singapore, Malaysia, Indonesia, Thái Lan,
            Philippines. Với sự đảm bảo của Shoop, bạn sẽ mua hàng trực tuyến an
            tâm và nhanh chóng hơn bao giờ hết!
          </p>
          <p class="font-bold text-[14px] mt-10">
            MUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN
          </p>
          <p class="mt-5 text-[#000000DE] text-[14px] leading-5 mr-[56px]">
            Nếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến
            thì Shoop.vn là một sự lựa chọn tuyệt vời dành cho bạn. Shoop là
            trang thương mại điện tử cho phép người mua và người bán tương tác
            và trao đổi dễ dàng thông tin về sản phẩm và chương trình khuyến mãi
            của shop. Do đó, việc mua bán trên Shoop trở nên nhanh chóng và đơn
            giản hơn. Bạn có thể trò chuyện trực tiếp với nhà bán hàng để hỏi
            trực tiếp về mặt hàng cần mua. Còn nếu bạn muốn tìm mua những dòng
            sản phẩm chính hãng, uy tín, Shoop chính là sự lựa chọn lí tưởng
            dành cho bạn. Để bạn có thể dễ dàng khi tìm hiểu và sử dụng sản
            phẩm, Shoop Blog - trang blog thông tin chính thức của Shoop - sẽ
            giúp bạn có thể tìm được cho mình các kiến thức về xu hướng thời
            trang, review công nghệ, mẹo làm đẹp, tin tức tiêu dùng và deal giá
            tốt bất ngờ.
          </p>
          <p class="mt-[10px] text-[#000000DE] text-[14px] leading-5 mr-[65px]">
            Đến với Shoop, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao
            giờ hết. Chỉ với vài thao tác trên ứng dụng, bạn đã có thể đăng bán
            ngay những sản phẩm của mình. Không những thế, các nhà bán hàng có
            thể tự tạo chương trình khuyến mãi trên Shoop để thu hút người mua
            với những sản phẩm có mức giá hấp dẫn. Khi đăng nhập tại Shoop Kênh
            người bán, bạn có thể dễ dàng phân loại sản phẩm, theo dõi đơn hàng,
            chăm sóc khách hàng và cập nhập ngay các hoạt động của shop.
          </p>
          <p class="mt-[10px] text-[#000000DE] text-[14px] leading-5 mr-[87px]">
            Bên cạnh đó, Shoop hợp tác với nhiều đơn vị vận chuyển uy tín trên
            thị trường như SPX,... nhằm cung cấp dịch vu giao nhận và vận chuyển
            tiện lợi cho cả khách hàng và người bán. Cùng với nhiều ưu đãi với
            chi phí giao hàng hợp lý, Shoop đảm bảo cho khách hàng trải nghiệm
            mua sắm thuận tiện nhất.
          </p>
          <p class="font-bold text-[14px] mt-10">TOP TỪ KHÓA XU HƯỚNG</p>
          <p class="mt-5 text-[#000000DE] text-[14px] leading-5 mr-[87px]">
            pandora | vaseline | trang trí tết | máy nước nóng trực tiếp | vợt
            cầu lông | dexeryl | vascara | myherbalife | hasaki | flower knows |
            avakids | đèn sưởi nhà tắm | kem nẻ | kidsplaza | vnb | wind breaker
            | ghế massage toàn thân | pin | thỏi vàng | concung | móng tay đẹp |
            bao cao su | yonex | truyện tranh đam mỹ | tô tượng | lego |
            memoryzone | mwc | gấu dâu | ivy moda
          </p>
        </div>
        <div class="mt-[70px]">
          <p class="font-bold text-[14px]">Danh Mục</p>
          <div class="grid grid-cols-5 mt-5 gap-5">
            <div class="flex flex-col gap-2.5">
              <div>
                <p class="font-bold text-[14px]">THỜI TRANG NAM</p>
                <p
                  class="my-2.5 text-[#00000080] text-[12px] leading-[14.52px]"
                >
                  Áo Khoác | Áo Vest và Blazer | Áo Hoodie, Áo Len & Áo Nỉ |
                  Quần Jeans | Quần Dài/Quần Âu | Quần Short | Áo | Áo Ba Lỗ |
                  Đồ Lót | Đồ Ngủ | Đồ Bộ | Vớ/Tất | Trang PhụcTruyền Thống | Đồ
                  Hóa Trang | Trang Phục Ngành Nghề | Khác | Trang Sức Nam |
                  Kính Mắt Nam | Thắt Lưng Nam | Cà vạt & Nơ cổ | Phụ Kiện Nam
                </p>
              </div>
              <div>
                <p class="font-bold text-[14px]">ĐỒNG HỒ</p>
                <p
                  class="mt-2.5 pb-[54px] text-[#00000080] text-[12px] leading-[14.52px]"
                >
                  Đồng Hồ Nam | Đồng Hồ Nữ | Bộ Đồng Hồ & Đồng Hồ Cặp | Đồng Hồ
                  Trẻ Em | Phụ Kiện Đồng Hồ | Khác
                </p>
              </div>
            </div>
            <div>
              <p class="font-bold text-[14px]">THỜI TRANG NỮ</p>
              <p class="my-2.5 text-[#00000080] text-[12px] leading-[14.52px]">
                Quần | Quần đùi | Chân váy | Quần jeans | Đầm/Váy | Váy cưới |
                Đồ liền thân | Áo khoác, Áo choàng & Vest | Áo len & Cardigan |
                Hoodie và Áo nỉ | Bộ | Đồ lót | Đồ ngủ | Áo | Đồ tập | Đồ Bầu |
                Đồ truyền thống | Đồ hóa trang | Vải | Vớ/ Tất | Khác
              </p>
            </div>
            <div>
              <p class="font-bold text-[14px]">ĐIỆN THOẠI & PHỤ KIỆN</p>
              <p class="my-2.5 text-[#00000080] text-[12px] leading-[14.52px]">
                Điện thoại | Máy tính bảng | Pin Dự Phòng | Pin Gắn Trong, Cáp
                và Bộ Sạc | Ốp lưng, bao da, Miếng dán điện thoại | Bảo vệ màn
                hình | Đế giữ điện thoại | Thẻ nhớ | Sim | Phụ kiện khác | Thiết
                bị khác
              </p>
            </div>
            <div>
              <p class="font-bold text-[14px]">THIẾT BỊ ĐIỆN TỬ</p>
              <p class="my-2.5 text-[#00000080] text-[12px] leading-[14.52px]">
                Thiết bị đeo thông minh | Phụ kiện tivi | Máy Game Console | Phụ
                kiện Console | Đĩa game | Linh phụ kiện | Tai nghe nhét tai |
                Loa | Tivi | Tivi Box | Headphones
              </p>
            </div>
            <div>
              <p class="font-bold text-[14px]">SỨC KHỎE</p>
              <p class="my-2.5 text-[#00000080] text-[12px] leading-[14.52px]">
                Vật tư y tế | Chống muỗi & xua đuổi côn trùng | Thực phẩm chức
                năng | Tã người lớn | Hỗ trợ làm đẹp | Hỗ trợ tình dục | Dụng cụ
                massage và trị liệu | Khác
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </DefaultLayout>
</template>

<script setup lang="ts">
import DefaultLayout from "~/layouts/Default.vue";
import { useCategoryService } from "~/services/category";
import { useProductService } from "~/services/product";

const categoryService = useCategoryService();
const productService = useProductService();

const categories = ref(null);

const specialProducts = ref(null);
const saleProducts = ref(null);
const suggestProducts = ref(null);

onMounted(async () => {
  await categoryService
    .getAll()
    .then((res) => {
      categories.value = res.data;
    })
    .catch((e) => {
      console.log(e);
    });

  await productService
    .getSpecialProduct()
    .then((res) => {
      specialProducts.value = res.data;
    })
    .catch((e) => {
      console.log(e);
    });

  await productService
    .getSaleProduct()
    .then((res) => {
      saleProducts.value = res.data;
    })
    .catch((e) => {
      console.log(e);
    });

  await productService
    .getSuggestProduct()
    .then((res) => {
      suggestProducts.value = res.data;
      console.log(suggestProducts.value);
    })
    .catch((e) => {
      console.log(e);
    });
});
</script>