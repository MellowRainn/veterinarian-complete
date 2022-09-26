import {
  getAppointmentData,
  setAppointmentData,
  getAppointmentsData,
} from '../adapters/supabaseAdapter.js';

export async function getAppointment(req, res) {
  const rows = await getAppointmentData(req.params.id);
  if (rows.length > 0) {
    const response = {};
    response.meta = {
      title: 'individual appointment',
      url: `${req.originalUrl}`
    }
    response.data = rows[0];
    res.json(response);
  } else {
    res.status(500).json({ message: 'i cannot find the appointment' });
  }
}

export async function getAppointments(req, res) {
  const appointments = {};
  const rows = await getAppointmentsData();
  if (rows.length > 0) {
    appointments.meta = {
      title: 'all appointments',
      url: req.originalUrl,
    };
    appointments.data = [];
    rows.map((appointment) => {
      appointments.data.push({
        url_to_self: `${req.originalUrl}/${appointment.id}`,
        date: appointment.date,
        state: appointment.state,
        timeslot: appointment.timeslot,
      });
    });
    res.json(appointments);
  } else {
    res.status(500);
    res.json({
      title: 'no appointments found',
      message: `🥴 We did something wrong`,
    });
  }
}

export async function setAppointment(req, res) {
  const appointment = {};
  if (req.body.pet && req.body.timeslot && req.body.date) {
    appointment.pet = req.body.pet;
    appointment.date = req.body.date;
    appointment.timeslot = req.body.timeslot;
    const rows = await setAppointmentData(appointment);
    if (rows.length >= 0) {
      res.json({
        title: 'appointment added',
        message: `📅 Appointment for ${appointment.pet} is made on ${appointment.date} at ${appointment.timeslot}`,
      });
    } else {
      res.status(500);
      res.json({
        title: 'cannot add appointment',
        message: `Unknown causes`,
      });
    }
  } else {
    res.status(422);
    res.json({
      title: 'cannot add appointment',
      message: `You need to set client, date and time`,
    });
  }
}
