"use strict";

$("#myEvent").fullCalendar({
  height: 'auto',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  defaultView: 'agendaDay', // 设置默认视图为 'agendaDay'
  minTime: "08:00:00", // 设置最小时间为 8am
  maxTime: "23:00:00", // 设置最大时间为 12pm
  editable: true,
  events: [
    {
      title: 'Exercise Event 1',
      start: moment().format('YYYY-MM-DD') + 'T09:00:00', // 设置开始时间为今天的9am
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#9c8bee;'
    },
  ]

});
