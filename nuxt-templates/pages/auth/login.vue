<template>
  <AuthLayout>
    <div class="max-w-[1200px] mx-auto w-full flex">
      <div class="w-full">
        <div class="ml-[50px] my-[132px]">
          <div class="text-[28px] text-[#007006] font-bold">
            Bán hàng chuyên nghiệp
          </div>
          <div
            class="text-[18px] text-[#000000DE] leading-[21.78px] w-[388px] mt-[30px]"
          >
            Quản lý shop của bạn một cách hiệu quả hơn trên Shoop với Shoop -
            Kênh Người bán
          </div>
          <div class="mt-[50px]">
            <img src="~/assets/images/image 35.png" />
          </div>
        </div>
      </div>
      <div class="w-full flex items-center justify-end py-[50px]">
        <div class="w-[500px] bg-white p-[30px]">
          <div class="text-[24px]">Đăng nhập</div>
          <div class="mt-[39px]">
            <FormInput
              :placeholder="$t('PLACEHOLDER.email')"
              inputType="email"
              :error="
                error && error.type == $t('ATTRIBUTE.user.email')
                  ? error.message
                  : ''
              "
              v-model:input="user.email"
            />
          </div>
          <div class="mt-5">
            <FormInput
              :placeholder="$t('PLACEHOLDER.password')"
              inputType="password"
              :error="
                error && error.type == $t('ATTRIBUTE.user.password')
                  ? error.message
                  : ''
              "
              v-model:input="user.password"
            />
          </div>
          <div class="text-end text-[16px] text-[#007006] mt-5">
            <NuxtLink to="/auth/forgot"> Quên mật khẩu </NuxtLink>
          </div>
          <button
            class="mt-[40px] w-full rounded bg-[#007006] text-white text-center py-[16px] uppercase"
            @click="login()"
          >
            {{ $t("ACTION.login") }}
          </button>
          <div class="mt-[99px] text-center w-full">
            Bạn mới biết đến Shoop?
            <NuxtLink class="text-[#007006]" to="/auth/register">
              Đăng ký</NuxtLink
            >
          </div>
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from "~/layouts/Auth.vue";
import type { User } from "~/types/models/user";
import { useAuthService } from "~/services/auth";
import { useTrans } from "~/composables/trans";
import { useStoreStore } from "~/stores/store";
import { useSessionStore } from "~/stores/session";
import { useStoreService } from "~/services/store";

const { required, maxLength, notEmpty, emailFormatted, hasWhiteSpace } =
  useValidate();
const { trans } = useTrans();
const sessionStore = useSessionStore();
const storeStore = useStoreStore();
const storeService = useStoreService();

const error = ref(null);

const user = reactive<User>({
  email: null,
  password: null,
});

onMounted(() => {
  if (sessionStore.token) {
    navigateTo("/admin");
  }
});

const login = async () => {
  error.value = null;

  if (!required(user.email?.trim()) || !notEmpty(user.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (!emailFormatted(user.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_VAL_0003", [trans("ATTRIBUTE.user.email")]),
    };
  } else if (!maxLength(user.email, 255)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_VAL_0002", [trans("ATTRIBUTE.user.email"), 255]),
    };
  } else if (!required(user.password?.trim()) || !notEmpty(user.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: trans("ERR_VAL_0001", [trans("ATTRIBUTE.user.password")]),
    };
  } else if (hasWhiteSpace(user.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: "Mật khẩu không được có khoảng trắng",
    };
  }

  if (error.value) {
    return;
  }

  const response = await useAuthService().login(user);

  if (response.status) {
    sessionStore.setToken(response.data.token);
    storeStore.id = response.data.store_id;

    storeStore.getInfo(response.data.store_id);
    navigateTo("/admin");
  }
};
</script>