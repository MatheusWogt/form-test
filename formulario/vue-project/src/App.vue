<script setup>
</script>

<template>
  <div id="app">
    <header>
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />

      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;700&display=swap"
        rel="stylesheet"
      />

      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </header>

    <div class="container col-md-8 col-lg-6 col-xl-4">
      <div class="d-flex justify-content-center my-3">
        <img
          src="https://memorar.fot.br/images/company/memorar.fot.br.png"
          alt="Imagem do logo da Memorar"
          width="200"
        />
      </div>
      <h1 class="h5 fw-bold text-center">Crie sua conta na Memorar</h1>
      <form class="row gx-3" id="createUser" @submit.prevent="onSubmitFunction">
        <div class="form-floating mb-3">
          <input
            type="text"
            v-model="userForm.name"
            class="form-control pl-4"
            placeholder="Nome completo"
            required
          />
          <label for="completeName">Nome completo</label>
        </div>
        <div class="form-floating mb-3 col-md-6">
          <input
            v-model="userForm.phone"
            type="tel"
            class="form-control"
            placeholder="Telefone"
            pattern="^\s*(\d{2}|\d{0})[-. ]?(\d{5}|\d{4})[-. ]?(\d{4})[-. ]?\s*$"
            required
          />
          <label for="phoneNumber">Telefone</label>
        </div>
        <div class="form-floating mb-3 col-md-6">
          <input
            v-model="userForm.birthDate"
            type="date"
            class="form-control"
            placeholder="Data de ascimento"
            required
          />
          <label for="birthday ">Data de nascimento</label>
        </div>
        <div class="form-floating mb-3">
          <input
            v-model="userForm.email"
            type="email"
            class="form-control"
            pattern="^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"
            placeholder="E-mail"
            required
          />
          <label for="email">E-mail</label>
        </div>
        <div class="form-floating col-md-6">
          <input
            v-model="userForm.password"
            type="password"
            class="form-control"
            pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
            placeholder="Crie uma senha"
            required
          />
          <label for="password">Crie uma senha</label>
        </div>
        <small class="mb-2 text-muted d-block d-md-none mx-2"
          >Mínimo 8 caracteres sendo ao menos 1 letra e 1 número</small
        >
        <div class="form-floating col-md-6">
          <input
            v-model="userForm.repetedPassword"
            type="Password"
            class="form-control"
            pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
            placeholder="Repita sua senha"
            required
          />
          <label for="repetedPassword">Repita sua senha</label>
        </div>
        <small class="text-muted d-none d-md-block mx-2"
          >Mínimo 8 caracteres sendo ao menos 1 letra e 1 número</small
        >
        <div class="form-floating my-3 mt-md-2">
          <input
            v-model="userForm.cpf"
            type="text"
            class="form-control"
            pattern="^([-\.\s]?(\d{3})){3}[-\.\s]?(\d{2})$"
            placeholder="CPF"
            required
          />
          <label for="CPF">CPF</label>
        </div>
        <div class="alert alert-danger" v-if="showMensageError">
          {{ errorMensage }}
        </div>
        <input
          type="submit"
          class="p-3 px-5 w-auto btn btn-primary m-auto"
          value="Cadastrar"
        />
        <div class="alert alert-success mt-3" v-if="showSuccessAlert">
          {{ successAlert }}
        </div>

        <table class="table table-striped mt-3 mx-auto">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Telefone</th>
              <th scope="col">Nascimento</th>
              <th scope="col">E-mail</th>
              <th scope="col">CPF</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <th>{{ user.id }}</th>
              <td>{{ user.name }}</td>
              <td>{{ user.phone }}</td>
              <td>{{ user.birthDate }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.cpf }}</td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: function () {
    return {
      showMensageError: false,
      errorMensage: "aconteceu algo de errado",
      showSuccessAlert: false,
      successAlert: "Conta criada com sucesso!",
      userForm: {},
      users: [],
    };
  },

  methods: {
    onSubmitFunction: function () {
      if (this.userForm.password != this.userForm.repetedPassword) {
        this.showSuccessAlert = false;
        this.showMensageError = true;
        this.errorMensage = "As senhas não são iguais, verifique!";
      } else {
        this.showMensageError = false;
        this.showSuccessAlert = true;

        const data = new URLSearchParams();
        for (var [key, value] of Object.entries(this.userForm)) {
          data.append(key, value);
        }

        axios.post("http://localhost:9090/users", data).then(() => {
          this.getUsers();
        });
        this.resetForm();
      }
    },

    resetForm: function () {
      this.userForm.name = "";
      this.userForm.phone = "";
      this.userForm.birthDate = "";
      this.userForm.email = "";
      this.userForm.password = "";
      this.userForm.repetedPassword = "";
      this.userForm.cpf = "";
    },

    getUsers: function () {
      axios.get("http://localhost:9090/users").then((response) => {
        this.users = response.data;
      });
    },
  },

  mounted: function () {
    this.getUsers();
  },
};
</script>
  

<style>
body {
  font-family: "Work Sans", sans-serif;
}

#createUser label {
  left: auto !important;
}
</style>
