# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Attendance(models.Model):
    _name = 'school.attendance'
    _description = 'Attendance of Student Model'
    student_id = fields.Many2one('school.student')
    state = fields.Selection([
        ('excused ', 'Excused Absence'),
        ('unexcused', 'Unexcused Absence')
    ], string='State')
    remark = fields.Char()
    attendance_date = fields.Date('Attendance Date')