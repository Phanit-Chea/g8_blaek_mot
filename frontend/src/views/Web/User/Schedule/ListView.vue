<template>
  <div class="m-0">
    <NavbarVue></NavbarVue>

    <div class="container-fluid me-2" style="padding-top: 11.93%">
      <div class="row flex-nowrap">
        <user-profile-sidebar-vue />

        <div class="col-xl-10 mt-3">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarVue from '../../Navbar/NavbarView.vue'
import userProfileSidebarVue from '../../../../Components/Layouts/userProfileSidebar.vue'
import axiosInstance from '@/plugins/axios'

export default {
  components: {
    NavbarVue,
    userProfileSidebarVue
  },
  data() {
    return {
      weeklyMenu: []
    }
  },
  mounted() {
    this.fetchWeeklyMenu()
    // Load the FullCalendar script
    const script = document.createElement('script')
    script.src = 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'
    script.onload = () => {
      this.initializeCalendar()
    }
    document.body.appendChild(script)

    // Load the demo-to-codepen script
    const demoScript = document.createElement('script')
    demoScript.src = '/docs/dist/demo-to-codepen.js'
    document.body.appendChild(demoScript)
  },
  methods: {
    async fetchWeeklyMenu() {
      try {
        const response = await axiosInstance.get('food/weekly/random')
        this.weeklyMenu = response.data.weekly_menu.flatMap((dailyMenu) =>
          dailyMenu.map((item) => ({
            id: item.id,
            title: item.name,
            start: item.start,
            end: item.end,
            color: 'green',
            textColor: 'white',
            duration: item.time
          }))
        )
        console.log('Weekly menu:', this.weeklyMenu)
        this.initializeCalendar()
      } catch (error) {
        console.error('Error fetching weekly menu:', error)
      }
    },
    initializeCalendar() {
      const calendarEl = document.getElementById('calendar')
      if (calendarEl) {
        const calendar = new window.FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridWeek',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
          },
          events: this.weeklyMenu,
          eventClick: function (info) {
            // Navigate to the detail page using a router link
            this.$router.push({ name: 'food-detail', params: { id: info.event.id } })
          }.bind(this)
        })
        calendar.render()
      }
    }
  }
}
</script>

<style scoped>
#calendar {
  height: 400px;
}

</style>

