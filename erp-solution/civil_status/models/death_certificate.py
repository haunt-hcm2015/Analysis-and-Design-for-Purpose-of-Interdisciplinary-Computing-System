# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class DeathCertification(models.Model):
    _name = 'death.certification'
    _description = 'Death Certification Model'
    death_certificate_number = fields.Char('Death Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])