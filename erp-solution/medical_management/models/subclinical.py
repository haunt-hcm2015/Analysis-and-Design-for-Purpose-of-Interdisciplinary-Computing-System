# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Subclinical(models.Model):
    _name = 'medical.subclinical'
    _description = 'Subclinical Data Modeling'
    services_ids = fields.One2many('medical.services', 'subclinical_id', string='Services')
    subclinical_group_ids = fields.One2many('medical.subclinical.group', 'subclinical_id', string='Subclinical Group')
    ct_scan_ids = fields.One2many('subclinical.ct','subclinical_id', string='CT Scan')
    blood_test_ids = fields.One2many('subclinical.blood.test','subclinical_id', string='Blood Test')
    eeg_ids = fields.One2many('subclinical.eeg','subclinical_id', string='EEG')
    mri_ids = fields.One2many('subclinical.mri','subclinical_id', string='MRI')
    pathological_diagnosis_ids = fields.One2many('subclinical.pathological.diagnosis','subclinical_id', string='Pathological Diagnosis')
    supersonic_ids = fields.One2many('subclinical.supersonic','subclinical_id', string='Supersonic')
    functional_exploration_ids = fields.One2many('subclinical.functional.exploration','subclinical_id', string='Functional Exploration')
    xray_ids = fields.One2many('subclinical.xray','subclinical_id', string='X-ray')
    lithotripsy_ids = fields.One2many('subclinical.lithotripsy','subclinical_id', string='Lithotripsy')
class SubclinicalGroup(models.Model):
    _name = 'medical.subclinical.group'
    _description = 'Subclinical Group Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical')
    name = fields.Char('Subclinical Group')
    description = fields.Char()
class CT(models.Model):
    _name = 'subclinical.ct'
    _description = 'Subclinical CT Scan Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class BloodTest(models.Model):
    _name = 'subclinical.blood.test'
    _description = 'Subclinical Blood Test Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class EEG(models.Model):
    _name = 'subclinical.eeg'
    _description = 'Subclinical EEG Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class MRI(models.Model):
    _name = 'subclinical.mri'
    _description = 'Subclinical MRI Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class PathologicalDiagnosis(models.Model):
    _name = 'subclinical.pathological.diagnosis'
    _description = 'Subclinical Pathological Diagnosis Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class Supersonic(models.Model):
    _name = 'subclinical.supersonic'
    _description = 'Supersonic Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class FunctionalExploration(models.Model):
    _name = 'subclinical.functional.exploration'
    _description = 'Functional Exploration Model'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class XRay(models.Model):
    _name = 'subclinical.xray'
    _description = 'X-Ray Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()
class Lithotripsy(models.Model):
    _name = 'subclinical.lithotripsy'
    _description = 'Lithostripsy Data Modeling'
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
    description = fields.Char()



