# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AdoptionCertification(models.Model):
    _name = 'adoption.certification'
    _description = 'Adoption Certification Model'
    adoption_certificate_number = fields.Char('Adoption Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])
    