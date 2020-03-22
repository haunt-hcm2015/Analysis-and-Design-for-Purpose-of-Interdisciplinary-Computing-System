# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class GuardianCertification(models.Model):
    _name = 'guardian.certification'
    _description = 'Guardian Certification Model'
    guardian_certificate_number = fields.Char('Guardian Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])