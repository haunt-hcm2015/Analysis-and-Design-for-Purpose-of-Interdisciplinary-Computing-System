# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ParentsChildrenCertification(models.Model):
    _name = 'parents.children.certification'
    _description = 'Parents and Children Certification Model'
    parents_children_certificate_number = fields.Char('Parents and Children Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])