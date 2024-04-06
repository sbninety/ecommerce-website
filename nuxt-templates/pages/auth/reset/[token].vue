<template>
  <AuthLayout>
    <div class="w-full h-[600px]">
      <div class="max-w-[1200px] w-full mx-auto">
        <div class="w-[500px] mx-auto bg-white px-[30px] pb-[50px] mt-[50px]">
          <div class="relative text-center w-full text-[24px] py-5">
            Đặt lại mật khẩu
            <div class="absolute top-[25px]">
              <NuxtLink>
                <img src="~/assets/images/back 1.png" />
              </NuxtLink>
            </div>
          </div>
          <div class="mt-[30px]">
            <FormInput
              :placeholder="$t('PLACEHOLDER.password')"
              inputType="password"
              :error="
                error && error.type == $t('ATTRIBUTE.user.password')
                  ? error.message
                  : ''
              "
              v-model:input="formData.password"
            />
          </div>
          <div class="mt-5">
            <FormInput
              :placeholder="$t('PLACEHOLDER.password')"
              inputType="password"
              :error="
                error && error.type == 'confirmPassword' ? error.message : ''
              "
              v-model:input="formData.password_confirmation"
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

const route = useRoute();

const { required, notEmpty, hasWhiteSpace } = useValidate();

const { trans } = useTrans();

const error = ref(null);
const token = ref(null);

const authService = useAuthService();

const formData = reactive({
  token: null,
  password: null,
  password_confirmation: null,
});

onMounted(async () => {
  formData.token = route.params.token;
  await authService.checkToken(formData.token);
});

const submit = async () => {
  error.value = null;

  if (!required(formData.password?.trim()) || !notEmpty(formData.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: trans("ERR_COM_0001", [trans("ATTRIBUTE.user.password")]),
    };
  } else if (hasWhiteSpace(formData.password)) {
    error.value = {
      type: trans("ATTRIBUTE.user.password"),
      message: "Mật khẩu không được có khoảng trắng",
    };
  } else if (!(formData.password_confirmation === formData.password)) {
    error.value = {
      type: "confirmPassword",
      message: "Mật khẩu phải giống nhau",
    };
  }

  if (error.value) {
    return;
  }

  const res = await authService.resetPassword(formData);
  if (res.status) {
    navigateTo("/auth/login");
  }
};
</script>