# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BirthCertificate(models.Model):
    _name = 'birth.certificate'
    _description = 'Birth Certificate Model'
    _rec_name = 'birth_certificate_number'
    birth_certificate_number = fields.Char('Birth Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])
    

