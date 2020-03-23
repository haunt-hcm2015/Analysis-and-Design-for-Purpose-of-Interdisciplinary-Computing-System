# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class SubjectDetail(models.Model):
    _name = 'school.subject.detail'
    _description = 'Subject Detail Model'
    subject_id = fields.Many2one('school.subject',string='Subject')
    lecture_id = fields.Many2one('hr.employee',string='Lecture')
    start_day = fields.Date('Start Day')
    end_day = fields.Date('End Day')