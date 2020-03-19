# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BirthCertificate(models.Model):
    _name = 'birth.certificate'
    _description = 'Birth Certificate Model'
    _rec_name = 'birth_certificate_number'
    birth_certificate_number = fields.Char('Birth Certificate Number')
    country                  = fields.Char('Country')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])
    citizen_ids              = fields.One2many('citizen', 'birth_certificate_id')
