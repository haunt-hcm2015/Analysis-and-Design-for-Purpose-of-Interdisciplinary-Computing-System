# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class TimeTable(models.Model):
    _name = 'school.timetable'
    _description = 'TimeTable Model'
    teacher_id = fields.Many2one('hr.employee',string='Teacher')
    
