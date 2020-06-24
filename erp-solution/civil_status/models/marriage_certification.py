# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MarriageCertification(models.Model):
    _name = 'marriage.certification'
    _description = 'Marriage Certification Model'
    marriage_certificate_number = fields.Char('Marriage Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])