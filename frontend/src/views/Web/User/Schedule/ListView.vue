<template>
  <div>
    <NavbarVue></NavbarVue>

    <div class="container-fluid" style="padding-top:11.93%; ">
      <div class="row flex-nowrap">
        <user-profile-sidebar-vue />

        <div class="col-xl-9 mt-4">
          <div id="calendar"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarVue from '../../Navbar/NavbarView.vue'
import userProfileSidebarVue from '../../../../Components/Layouts/userProfileSidebar.vue'

export default {
  components: {
    NavbarVue,
    userProfileSidebarVue
  },
  mounted() {
    // Load the FullCalendar script
    const script = document.createElement('script')
    script.src = 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'
    script.onload = () => {
      // Initialize the FullCalendar instance
      const calendarEl = document.getElementById('calendar')
      const calendar = new window.FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today addEventButton',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons: {
          addEventButton: {
            text: 'Add Event',
            click: function() {
              // Handle add event button click
              alert('Add Event button clicked!')
            }
          }
        },
        events: [
          {
            title: 'All Day Event',
            start: '2024-07-01'
          },
          {
            title: 'Long Event',
            start: '2023-07-07',
            end: '2023-07-10'
          },
          {
            groupId: 'other',
            title: 'Repeating Event',
            start: '2023-07-09T16:00:00'
          },
          {
            groupId: 'other',
            title: 'Repeating Event',
            start: '2023-07-16T16:00:00'
          }
        ]
      })
      calendar.render()
    }
    document.body.appendChild(script)

    // Load the demo-to-codepen script
    const demoScript = document.createElement('script')
    demoScript.src = '/docs/dist/demo-to-codepen.js'
    document.body.appendChild(demoScript)
  }
}
</script>

<style>
.fc-event {
  padding-top: 10px;
  height: 40px;
}

.calendar {
  height: 350px;
}
</style>