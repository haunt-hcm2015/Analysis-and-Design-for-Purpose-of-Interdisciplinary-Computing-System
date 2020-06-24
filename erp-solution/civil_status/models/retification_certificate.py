# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class RetificationCertification(models.Model):
    _name = 'retification.certification'
    _description = 'Retification Certification Model'
    retification_certificate_number = fields.Char('Retification Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])