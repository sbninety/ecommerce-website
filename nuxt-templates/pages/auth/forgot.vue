<template>
  <AuthLayout>
    <div class="w-full h-[600px]">
      <div class="max-w-[1200px] w-full mx-auto">
        <div class="w-[500px] mx-auto bg-white px-[30px] pb-[30px] mt-[50px]">
          <div class="relative text-center w-full text-[24px] py-5">
            Đặt lại mật khẩu
            <div class="absolute top-[25px]">
              <NuxtLink>
                <img src="~/assets/images/back 1.png" />
              </NuxtLink>
            </div>
          </div>
          <div class="mt-[30px]">
            <div>{{ message }}</div>
            <FormInput
              :placeholder="$t('PLACEHOLDER.email')"
              inputType="email"
              :error="
                error && error.type == $t('ATTRIBUTE.user.email')
                  ? error.message
                  : ''
              "
              v-model:input="formData.email"
            />
          </div>
          <button
            class="mt-[30px] w-full rounded bg-[#007006] text-white text-center py-[16px]"
            @click="submit()"
          >
            TIẾP THEO
          </button>
        </div>
      </div>
    </div>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from "~/layouts/Auth.vue";
import { useTrans } from "~/composables/trans";
import { useAuthService } from "~/services/auth";

const { required, notEmpty, emailFormatted } = useValidate();

const { trans } = useTrans();

const error = ref(null);
const formData = reactive({
  email: null,
});

const authService = useAuthService();

const submit = async () => {
  error.value = null;

  if (!required(formData.email?.trim()) || !notEmpty(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.email")]),
    };
    console.log(error.value);
  } else if (!emailFormatted(formData.email)) {
    error.value = {
      type: trans("ATTRIBUTE.user.email"),
      message: trans("ERR_COM_0016", [trans("ATTRIBUTE.user.email")]),
    };
  }

  if (error.value) {
    return;
  }

  const res = await authService.forgotPassword(formData);

  if (res.status) {
    alert("Yêu cầu đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra email");
  }
};
</script>