<template>
  <div>
    <header>
      <nav>
        <div class="nav-wrapper white">
          <a style="margin-left: 20px" href="#!" class="brand-logo black-text"
            >Xplorer</a
          >
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"
            ><i class="material-icons">menu</i></a
          >
          <ul class="right hide-on-med-and-down black-text">
            <li><Link class="black-text" href="/AllTutors">Tutors</Link></li>
            <li>
              <Link class="black-text" href="/AllStudents">Students</Link>
            </li>
            <li>
              <Link class="black-text" href="/TutorToAssignStudent"
                >Assignment Manager</Link
              >
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <article>
        <slot />
      </article>
    </main>

    
    
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";

export default {
  components: {
    Link,
  },
};
</script>
<style scoped>
main {
  flex: 1 0 auto;
}
</style>



