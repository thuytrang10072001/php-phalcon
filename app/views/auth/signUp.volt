{% extends 'layout.volt' %} {% block title%}
<title>Sign up</title>
{% endblock %} {% block content %}
<section class="login d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="login__form d-flex flex-column align-items-center">
        <div class="login__form--title">Sign Up</div>
        {% if flashSession.has('error') %}
        <div class="alert alert-danger">
          {{ flashSession.output() }}
        </div>
        {% endif %}
        <form id="form-login" method="post" action="/auth/signup">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              aria-describedby="emailHelp"
              pattern="[a-zA-Z\s]+"
              title="Only letters and white space allowed"
              required
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input
              type="tel"
              class="form-control"
              id="phone"
              name="phone"
              aria-describedby="emailHelp"
              pattern="^0\d{9,10}$"
              required
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input
              type="address"
              class="form-control"
              id="address"
              name="address"
              aria-describedby="emailHelp"
              pattern="[a-zA-Z0-9\s,]+"
              title="Only letters, numbers, commas and white space allowed"
              required
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input
              type="address"
              class="form-control"
              id="email"
              name="email"
              aria-describedby="emailHelp"
              required
            />
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="pass"
              name="pass"
              pattern=".{6,}"
              required
              title="Only letters, numbers, special @,#,_ allowed"
            />
          </div>
          <button type="submit" class="btn btn-dark">Signup</button>
        </form>
      </div>
    </div>
  </div>
</section>
{% endblock %}
