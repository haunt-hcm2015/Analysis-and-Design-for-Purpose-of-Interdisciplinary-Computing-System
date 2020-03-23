# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AdminReport(models.Model):
    _name = 'accounting.admin.report'
    _description = 'Accounting Admin Report Model'
    name = fields.Char('Report Name')
    report_number = fields.Char('Report Number')
    report_type_id = fields.Many2one('accounting.admin.report.type')
class AdminReportType(models.Model):
    _name = 'accounting.admin.report.type'
    _description = 'Accounting Admin Report Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()

    
    


