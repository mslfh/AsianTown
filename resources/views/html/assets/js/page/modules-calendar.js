"use strict";
let today = new Date();
let dates = Array.from({length: 7}, (_, i) => new Date(today.getFullYear(), today.getMonth(), today.getDate() + i));

$("#myEvent").fullCalendar({
  height: 'auto',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  editable: true,
  events: [
    {
      title: 'Running',
      start: dates[0],
      end: dates[0],
      backgroundColor: "#ffc107",
      borderColor: "#ffc107",
      textColor: '#fff'
    },
    {
      title: "Yoga",
      start: dates[1],
      backgroundColor: "#007bff",
      borderColor: "#007bff",
      textColor: '#fff'
    },
    {
      title: 'Swimming',
      start: dates[2],
      backgroundColor: "#f56954",
      borderColor: "#f56954",
      textColor: '#fff'
    },
    {
      title: 'Gym Workout',
      start: dates[3],
      backgroundColor: "#ffc107",
      borderColor: "#ffc107",
      textColor: '#fff'
    },
    {
      title: 'Cycling',
      start: dates[4],
      end: dates[4],
      backgroundColor: "#000",
      borderColor: "#000",
      textColor: '#fff'
    },
    {
      title: 'Rest',
      start: dates[5],
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
    {
      title: 'Hiking',
      start: dates[6],
      end: dates[6],
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
  ]

});
