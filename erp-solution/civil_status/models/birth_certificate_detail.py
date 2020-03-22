# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BirthCertificate(models.Model):
    _name = 'birth.certificate'
    _description = 'Birth Certificate Model'
    birth_certificate_id     = fields.Many2one('birth.certificate', string="Birth Certificate Info")   
    citizen_id               = fields.Many2one('citizen', string="Full name")                        
    parent_id                = fields.Many2one('citizen', string="Father's full name")
    mother_id                = fields.Many2one('citizen', string="Mother's full name")
    issue_date               = fields.Date('Issue Date')
    issue_by                 = fields.Char('Issue By')

